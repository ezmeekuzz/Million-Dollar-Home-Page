$(document).ready(function () {
    const pixelContainer = document.getElementById('pixel-container');
    const overlay = document.getElementById('overlay');
    let startX, startY;
    let selectionDiv;

    // Fetch image data from the server
    $.ajax({
        url: '/edit/getData',
        method: 'GET',
        dataType: 'json',
        success: function (data) {
            // Iterate through each object in the array
            data.forEach(function (imageData) {
                console.log('Image ID:', imageData.image_coordinate_id);
                console.log('Selected Pixels Coordinates:', JSON.parse(imageData.selectedPixelsCoordinates));
                console.log('Total Amount:', imageData.totalamount);
                console.log('Date Uploaded:', imageData.dateUploaded);

                console.log('---');

                // Cover pixels based on selectedPixelsCoordinates with a single image container
                coverPixels(pixelContainer, JSON.parse(imageData.selectedPixelsCoordinates));
            });
        },
        error: function (error) {
            console.error('Error fetching data:', error);
        }
    });

    function coverPixels(container, selectedPixelsCoordinates) {
        // Create a single container for the group
        const groupContainer = document.createElement('div');
        groupContainer.style.position = 'absolute';
        container.appendChild(groupContainer);
    
        // Cover individual pixels based on selectedPixelsCoordinates
        selectedPixelsCoordinates.forEach(function (coord) {
            const pixel = document.createElement('div');
            pixel.classList.add('pixel', 'restricted-pixel-boxes');
            pixel.classList.remove('available-pixel-boxes');
            pixel.style.position = 'absolute';
            pixel.style.left = coord.x + 'px';
            pixel.style.top = coord.y + 'px';
            pixel.style.width = '10px';
            pixel.style.height = '10px';
            //pixel.style.backgroundColor = 'rgba(128, 128, 128)'; // Grey color
            pixel.style.pointerEvents = 'none';
            groupContainer.appendChild(pixel);
        });
    }   
    function createPixels() {
        for (let i = 0; i < 10000; i++) {
            const pixel = document.createElement('div');
            pixel.classList.add('pixel', 'available-pixel-boxes');
            pixel.setAttribute('data-id', i + 1);
            pixelContainer.appendChild(pixel);
        }
    }

    function isInsideCompletePixelBox(x, y) {
        const rect = pixelContainer.getBoundingClientRect();
        const pixelSize = 10;
        const col = Math.floor((x - rect.left) / pixelSize);
        const row = Math.floor((y - rect.top) / pixelSize);
        const left = col * pixelSize + rect.left;
        const top = row * pixelSize + rect.top;
        return x >= left && x <= left + pixelSize && y >= top && y <= top + pixelSize;
    }

    pixelContainer.addEventListener('mousedown', (e) => {
        startX = e.clientX;
        startY = e.clientY;
    
        if (isInsideCompletePixelBox(startX, startY) && !isInsideGreyedOutArea(startX, startY)) {
            initializeOverlay();
            document.addEventListener('mousemove', handleDrag);
            document.addEventListener('mouseup', endDrag);
        }
    });
    
    function isInsideGreyedOutArea(x, y) {
        const greyOverlay = document.querySelector('.grey-overlay');
        if (greyOverlay) {
            const overlayRect = greyOverlay.getBoundingClientRect();
            return (
                x >= overlayRect.left &&
                x <= overlayRect.right &&
                y >= overlayRect.top &&
                y <= overlayRect.bottom
            );
        }
        return false;
    }
    

    function initializeOverlay() {
        overlay.style.width = '0';
        overlay.style.height = '0';
        overlay.style.display = 'block';

        selectionDiv = document.createElement('div');
        selectionDiv.classList.add('selection');
        overlay.appendChild(selectionDiv);
    }

    function handleDrag(e) {
        const deltaX = e.clientX - startX;
        const deltaY = e.clientY - startY;
    
        // Calculate the maximum delta for both X and Y directions
        const maxDeltaX = Math.min(70, Math.abs(deltaX));
        const maxDeltaY = Math.min(70, Math.abs(deltaY));
    
        // Use the minimum of the two as the overall maxDelta
        const maxDelta = Math.min(maxDeltaX, maxDeltaY);
    
        // Calculate the size based on the strict rules (1x1, 2x2, 3x3, ..., 7x7)
        const gridSize = 10;
        const snappedSize = Math.floor(maxDelta / gridSize) * gridSize;
    
        overlay.style.width = `${snappedSize}px`;
        overlay.style.height = `${snappedSize}px`;
    
        // Update the overlay position based on the direction of drag
        overlay.style.left = `${deltaX > 0 ? startX : (startX - snappedSize)}px`;
        overlay.style.top = `${deltaY > 0 ? startY : (startY - snappedSize)}px`;
    
        // Set the size of the selection div if it exists
        if (selectionDiv) {
            selectionDiv.style.width = `${snappedSize}px`;
            selectionDiv.style.height = `${snappedSize}px`;
        }
    
        highlightSelectedPixels();
    }

    function highlightSelectedPixels() {
        const pixels = document.querySelectorAll('.pixel');
        const rect = overlay.getBoundingClientRect();
        const pixelSize = 10;
        const maxHighlightSize = 7;

        const highlightedPixels = [];

        pixels.forEach((pixel) => {
            const pixelRect = pixel.getBoundingClientRect();

            const pixelCol = Math.floor((pixelRect.left - rect.left) / pixelSize);
            const pixelRow = Math.floor((pixelRect.top - rect.top) / pixelSize);

            const withinSelection = (
                pixelCol >= 0 && pixelCol < maxHighlightSize &&
                pixelRow >= 0 && pixelRow < maxHighlightSize
            );

            if (
                pixelRect.left < rect.right &&
                pixelRect.right > rect.left &&
                pixelRect.top < rect.bottom &&
                pixelRect.bottom > rect.top &&
                withinSelection
            ) {
                pixel.classList.add('highlighted');
                highlightedPixels.push({
                    x: pixelRect.left - pixelContainer.getBoundingClientRect().left,
                    y: pixelRect.top - pixelContainer.getBoundingClientRect().top
                });
            } else {
                pixel.classList.remove('highlighted');
            }
        });

        console.log('Highlighted Pixels Coordinates:', highlightedPixels);
    }

    function endDrag() {
        document.removeEventListener('mousemove', handleDrag);
        document.removeEventListener('mouseup', endDrag);
    
        overlay.style.display = 'none';
    
        // Calculate the total amount
        const totalAmount = calculateTotalAmount();
    
        // Check if any pixels are highlighted and total amount is greater than 0
        if (totalAmount > 0) {
            // Open the payment modal with the total amount
            updateCoordinatesData();
        } else {
            // Display a Swal message when no pixels are selected or total amount is 0
            Swal.fire({
                title: 'Warning!',
                text: 'No blocks selected!',
                icon: 'warning',
            });
        }
    }    

    function calculateTotalAmount() {
        const highlightedPixels = document.querySelectorAll('.highlighted');
        const totalAmount = highlightedPixels.length * 100;
        console.log(`Total Amount: $${totalAmount}`);
        return totalAmount;
    }
    
    function updateCoordinatesData() {
        Swal.fire({
            title: 'Are you sure you want to change the coordinates?',
            text: 'You won\'t be able to revert this!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, do it!',
            cancelButtonText: 'No, cancel!',
        }).then((result) => {
            if (result.isConfirmed) {
                const highlightedPixels = document.querySelectorAll('.highlighted');
                const coordinates = Array.from(highlightedPixels).map((pixel) => {
                    const rect = pixel.getBoundingClientRect();
                    return {
                        x: rect.left - pixelContainer.getBoundingClientRect().left,
                        y: rect.top - pixelContainer.getBoundingClientRect().top
                    };
                });
    
                const minX = Math.min(...coordinates.map(coord => coord.x));
                const minY = Math.min(...coordinates.map(coord => coord.y));
                const maxX = Math.max(...coordinates.map(coord => coord.x));
                const maxY = Math.max(...coordinates.map(coord => coord.y));
                const selectionCoordinates = {
                    x: minX,
                    y: minY,
                    width: maxX - minX,
                    height: maxY - minY
                };
    
                // Create FormData
                var formData = new FormData();
                formData.append('image_coordinate_id', $('#image_coordinate_id').val());
                formData.append('selectedPixelsCoordinates', JSON.stringify(coordinates));
                formData.append('groupCoordinates', JSON.stringify(selectionCoordinates));
                formData.append('numberOfPixelBoxes', highlightedPixels.length);

                // Send AJAX request
                $.ajax({
                    type: "POST",
                    url: '/edit/updateData',
                    processData: false,
                    contentType: false,
                    data: formData,
                    success: function (data) {
                        Swal.fire({
                            title: 'Success!',
                            text: 'Coordinates updated Successfully!',
                            icon: 'success',
                        });
                        setTimeout('window.location.href = "/"', 2000);
                    }
                });
            } else {
                // User clicked 'No' or closed the modal
                Swal.fire('Action cancelled', 'No changes were made.', 'info');
                // Optionally, you can add code for the 'No' case
            }
        });
    }

    createPixels(); 
});