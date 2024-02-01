$(document).ready(function () {
    const pixelContainer = document.getElementById('pixel-container');

    // Fetch image data from the server
    $.ajax({
        url: '/home/getData', // Replace with the actual URL
        method: 'GET',
        dataType: 'json',
        success: function (data) {
            data.forEach(function (imageData) {
                // Cover pixels based on selectedPixelsCoordinates with a single image container
                coverPixels(pixelContainer, JSON.parse(imageData.selectedPixelsCoordinates), imageData.imageLocation, imageData.image_coordinate_id, imageData);
            });
        },
        error: function (error) {
            console.error('Error fetching data:', error);
        }
    });

    function createPixels() {
        for (let i = 0; i < 10000; i++) {
            const pixel = document.createElement('div');
            pixel.classList.add('pixel', 'available-pixel-boxes');
            pixel.setAttribute('data-id', i + 1);
            pixelContainer.appendChild(pixel);
        }
    }

    function coverPixels(container, selectedPixelsCoordinates, imagePath, imageId, imageData) {
        // Calculate the bounding box for selectedPixelsCoordinates
        const boundingBox = calculateBoundingBox(selectedPixelsCoordinates);

        const City = imageData.city === '' ? '' : imageData.city;
        const State = imageData.state === '' ? '' : ', ' + imageData.state;
        const Country = imageData.country === '' ? '' : ', ' + imageData.country;
        const Location = City + State + Country;
        const content = `<div class="container custom-popover-content" style ="width: 300px !important;">
            <img src="${imagePath}" alt="Image" style="max-width: 100%; max-height: 100%;">
            <div class="row">
                <div class="col-lg-12 tooltip-details">
                    <span id="customerName">${imageData.name}</span>
                </div>
                <div class="col-lg-12 tooltip-details">
                    <span>${Location}</span>
                </div>
            </div>
        </div>`;
        // Create a single container for the group with the image as its background
        const groupContainer = document.createElement('div');
        groupContainer.classList.add('image-group', 'popoverClick');
        groupContainer.setAttribute('data-image-id', imageId);
        groupContainer.setAttribute('rel', 'popover');
        groupContainer.setAttribute('data-placement', 'right');
        groupContainer.setAttribute('data-original-title', 'Details');
        groupContainer.setAttribute('data-content', content);
        groupContainer.style.position = 'absolute';
        groupContainer.style.left = boundingBox.x + 'px';
        groupContainer.style.top = boundingBox.y + 'px';
        groupContainer.style.width = boundingBox.width + 'px';
        groupContainer.style.height = boundingBox.height + 'px';
        groupContainer.style.backgroundImage = `url(${imagePath})`;
        groupContainer.style.backgroundSize = 'cover';
        groupContainer.style.backgroundPosition = 'top left';

        // Append the container to the pixel container
        container.appendChild(groupContainer);
        // Enable Bootstrap popover on the group container

        // Add click event listener to the group container
        $(document).ready(function(){
            $('.popoverClick').popover({
                html: true, // Allow HTML content
                trigger: 'click' // Show popover on click
            }); 
            $('.popoverClick').on('click', function (e) {
                $('.popoverClick').not(this).popover('hide');
            });
            $('html').on('click', function(e) {
                if (typeof $(e.target).data('original-title') == 'undefined' && !$(e.target).parents().is('.popover.in')) {
                  $('[data-original-title]').popover('hide');
                }
            });
        });
    }

    function calculateBoundingBox(coordinates) {
        let minX = Number.MAX_SAFE_INTEGER;
        let minY = Number.MAX_SAFE_INTEGER;
        let maxX = Number.MIN_SAFE_INTEGER;
        let maxY = Number.MIN_SAFE_INTEGER;

        coordinates.forEach(function (coord) {
            minX = Math.min(minX, coord.x);
            minY = Math.min(minY, coord.y);
            maxX = Math.max(maxX, coord.x);
            maxY = Math.max(maxY, coord.y);
        });

        return {
            x: minX,
            y: minY,
            width: maxX - minX + 10,
            height: maxY - minY + 10
        };
    }

    createPixels();
    $('#search-input').on('keydown', function (event) {
        // Check if the pressed key is "Enter" (key code 13)
        if (event.which === 13) {
            // Prevent the default form submission behavior
            event.preventDefault();

            // Get the entered phone number from the input
            var phoneNumber = $(this).val();

            $.ajax({
                url: '/home/searchData',
                method: 'POST',
                data: { phoneNumber: phoneNumber },
                dataType: 'json',
                success: function (response) {
                    // Handle the response from the server
                    if (response.status === 'error') {
                        // Phone number not found or other error
                        console.log('Phone number not found or error:', response.message);
                        
                        // Show a Swal error message
                        Swal.fire({
                            title: 'Error!',
                            text: 'No data found for the entered phone number.',
                            icon: 'error',
                        });
                    } else {
                        // Phone number found, handle the data as needed
                        console.log('Phone number found:', response.data);
                        
                        // Assuming these properties exist in your response
                        var selectedPixelsCoordinates = response.selectedPixelsCoordinates;
                        var imageLocation = response.imageLocation;
                        var imageCoordinateId = response.image_coordinate_id;
            
                        coverPixels(pixelContainer, JSON.parse(selectedPixelsCoordinates), imageLocation, imageCoordinateId, response);
                        $('.image-group[data-image-id="' + imageCoordinateId + '"]').click();
                    }
                },
                error: function (xhr, status, error) {
                    // Handle AJAX errors if any
                    console.error('AJAX error:', error);
                }
            });
        }
    });
});