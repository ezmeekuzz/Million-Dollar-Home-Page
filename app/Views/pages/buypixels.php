<?=$this->include('templates/header');?>
<section class="home-1">
    <div id="pixel-container"></div>
    <div id="overlay"></div>
    <div class="modal fade" id="paymentModal" tabindex="-1" role="dialog" aria-labelledby="paymentModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="paymentModalLabel"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name:</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email:</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>

                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone number:</label>
                        <input type="tel" class="form-control" id="phone" name="phone" required>
                    </div>

                    <div class="mb-3">
                        <label for="city" class="form-label">City (Optional):</label>
                        <input type="text" class="form-control" id="city" name="city">
                    </div>

                    <div class="mb-3">
                        <label for="state" class="form-label">State (Optional):</label>
                        <input type="text" class="form-control" id="state" name="state">
                    </div>

                    <div class="mb-3">
                        <label for="country" class="form-label">Country (Optional):</label>
                        <input type="text" class="form-control" id="country" name="country">
                    </div>

                    <div class="mb-3">
                        <label for="imageLocation" class="form-label">Image Upload</label>
                        <input type="file" class="form-control" id="imageLocation" name="imageLocation" accept="image/*" required>
                    </div>

                    <div class="mb-3" hidden>
                        <label for="totalAmountInput" class="form-label">Total Amount:</label>
                        <input type="text" class="form-control" id="totalAmountInput" name="totalAmountInput" readonly>
                    </div>

                    <!-- PayPal payment button -->
                    <div id="paypalButton" class="mb-3">Pay with PayPal</div>
                </div>
            </div>
        </div>
    </div>
</section>
<script src="assets/js/custom/buypixels.js"></script>
<?=$this->include('templates/footer');?>