$(document).ready(function () {
    const pixelContainer = document.getElementById('pixel-container');
    const overlay = document.getElementById('overlay');
    let startX, startY;
    let selectionDiv;
    let isOverlayTouchingCovered = false;

    // Fetch image data from the server
    $.ajax({
        url: '/buypixels/getData',
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

    function isInsideCoveredArea(x, y) {
        const groupContainers = document.querySelectorAll('.restricted-pixel-boxes');
    
        for (const groupContainer of groupContainers) {
            const groupRect = groupContainer.getBoundingClientRect();
    
            if (
                x >= groupRect.left &&
                x <= groupRect.right &&
                y >= groupRect.top &&
                y <= groupRect.bottom
            ) {
                return true; // Point is inside the covered area
            }
        }
    
        return false; // Point is not inside the covered area
    }
    
    function isInsideCompletePixelBox(x, y) {
        const rect = pixelContainer.getBoundingClientRect();
        const pixelSize = 10;
        const col = Math.floor((x - rect.left) / pixelSize);
        const row = Math.floor((y - rect.top) / pixelSize);
        const left = col * pixelSize + rect.left;
        const top = row * pixelSize + rect.top;
    
        // Check if the point is inside a complete pixel box
        const isInsidePixelBox = x >= left && x <= left + pixelSize && y >= top && y <= top + pixelSize;
    
        // Check if the point is inside the area covered by coverPixels
        const isInsideCovered = isInsideCoveredArea(x, y);
    
        // Return true only if inside a pixel box and not inside the covered area
        return isInsidePixelBox && !isInsideCovered;
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
        overlay.style.left = `${deltaX > 0 ? startX : startX - snappedSize}px`;
        overlay.style.top = `${deltaY > 0 ? startY : startY - snappedSize}px`;
    
        // Set the size of the selection div if it exists
        if (selectionDiv) {
            selectionDiv.style.width = `${snappedSize}px`;
            selectionDiv.style.height = `${snappedSize}px`;
        }
    
        isOverlayTouchingCovered = checkOverlayTouchingCovered(); // Check if overlay touches covered blocks
        highlightSelectedPixels(); // Update highlighted pixels
    }
    function checkOverlayTouchingCovered() {
        const overlayRect = overlay.getBoundingClientRect();
        const groupContainers = document.querySelectorAll('.restricted-pixel-boxes');
    
        for (const groupContainer of groupContainers) {
            const groupRect = groupContainer.getBoundingClientRect();
    
            if (
                overlayRect.left < groupRect.right &&
                overlayRect.right > groupRect.left &&
                overlayRect.top < groupRect.bottom &&
                overlayRect.bottom > groupRect.top
            ) {
                return true; // Overlay is touching covered blocks
            }
        }
    
        return false; // Overlay is not touching covered blocks
    }
    function highlightSelectedPixels() {
        const pixels = document.querySelectorAll('.pixel');
        const rect = overlay.getBoundingClientRect();
        const pixelSize = 10;
    
        const highlightedPixels = [];
    
        pixels.forEach((pixel) => {
            const pixelRect = pixel.getBoundingClientRect();
    
            // Check if any part of the pixel is inside the overlay
            if (
                pixelRect.left < rect.right &&
                pixelRect.right > rect.left &&
                pixelRect.top < rect.bottom &&
                pixelRect.bottom > rect.top
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
    
        if (isOverlayTouchingCovered) {
            // Display an error message
            Swal.fire({
                title: 'Error!',
                text: 'You cannot select already purchased blocks!',
                icon: 'error',
            });
    
            // Reset the selection
            overlay.style.width = '0';
            overlay.style.height = '0';
            overlay.style.display = 'none';
            if (selectionDiv) {
                selectionDiv.remove();
                selectionDiv = null;
            }
        } else {
            // Continue with the rest of the code
    
            // Calculate the total amount
            const totalAmount = calculateTotalAmount();
    
            // Check if any pixels are highlighted and total amount is greater than 0
            if (totalAmount > 0) {
                // Open the payment modal with the total amount
                openModal(totalAmount);
            } else {
                // Display a Swal message when no pixels are selected or total amount is 0
                Swal.fire({
                    title: 'Warning!',
                    text: 'No blocks selected!',
                    icon: 'warning',
                });
            }
        }
    }  

    function calculateTotalAmount() {
        const highlightedPixels = document.querySelectorAll('.highlighted');
        const totalAmount = highlightedPixels.length * 100;
        console.log(`Total Amount: $${totalAmount}`);
        return totalAmount;
    }

    // Bootstrap modal setup
    const modal = $('#paymentModal');
    const totalAmountLabel = $('#paymentModalLabel');
    const totalAmountInput = $('#totalAmountInput');
    //const paypalButton = $('#paypalButton');

    function openModal(totalAmount) {
        totalAmountLabel.text(`Total Amount: $${totalAmount}`);
        totalAmountInput.val(`${totalAmount}`);
        modal.modal('show');
    }
    
    paypal.Buttons({
        createOrder: (data, actions) => {
            var name = $('#name').val();
            var email = $('#email').val();
            var phone = $('#phone').val();
            var imageLocation = $('#imageLocation')[0].files[0];
            var totalAmountInput = $('#totalAmountInput').val();
            var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
        
            if (name !== '' && email !== '' && phone !== '') {
                if (email.match(mailformat)) {
                    if (imageLocation) {  // Check if an image is selected
                        return actions.order.create({
                            purchase_units: [{
                                amount: {
                                    value: totalAmountInput
                                }
                            }]
                        });
                    } else {
                        Swal.fire({
                            title: 'Warning!',
                            text: 'Please select an image!',
                            icon: 'warning',
                        });
                    }
                } else {
                    Swal.fire({
                        title: 'Warning!',
                        text: 'Invalid email format!',
                        icon: 'warning',
                    });
                }
            } else {
                Swal.fire({
                    title: 'Warning!',
                    text: 'Please fill up all of the required form!',
                    icon: 'warning',
                });
            }
        },        
        onApprove: (data, actions) => {
            var name = $('#name').val();
            var email = $('#email').val();
            var phone = $("#phone").val();
            var city = $('#city').val();
            var state = $('#state').val();
            var country = $('#country').val();
            var totalAmountInput = $('#totalAmountInput').val();
            var imageLocation = $('#imageLocation')[0].files[0];
    
            // Check if file is selected
            if (imageLocation) {
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
    
                return actions.order.capture().then(function (orderData) {
                    console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
                    const transaction = orderData.purchase_units[0].payments.captures[0];
                    var transaction_number = transaction.id;
    
                    // Create FormData
                    var formData = new FormData();
                    formData.append('name', name);
                    formData.append('city', city);
                    formData.append('phone', phone);
                    formData.append('email', email);
                    formData.append('state', state);
                    formData.append('country', country);
                    formData.append('totalAmountInput', totalAmountInput);
                    formData.append('imageLocation', imageLocation);
                    formData.append('transaction_number', transaction_number);
                    formData.append('selectedPixelsCoordinates', JSON.stringify(coordinates));
                    formData.append('groupCoordinates', JSON.stringify(selectionCoordinates));
                    formData.append('numberOfPixelBoxes', highlightedPixels.length);
    
                    // Send AJAX request
                    $.ajax({
                        type: "POST",
                        url: 'buypixels/insert',
                        processData: false,
                        contentType: false,
                        data: formData,
                        success: function (data) {
                            Swal.fire({
                                title: 'Success!',
                                text: 'Order submitted Successfully!',
                                icon: 'success',
                            });
                            setTimeout('window.location.href = "/"', 2000);
                        }
                    });
                });
            } else {
                // Show a warning that a file must be selected
                Swal.fire({
                    title: 'Warning!',
                    text: 'Please select an image file!',
                    icon: 'warning',
                });
            }
        },
    
        onCancel: function (data) {
            Swal.fire({
                title: 'Warning!',
                text: 'You cancelled your payment!',
                icon: 'warning',
            });
        }
    }).render('#paypalButton');    

    createPixels(); 
});