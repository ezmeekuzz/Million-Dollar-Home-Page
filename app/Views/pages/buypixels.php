<?=$this->include('templates/header');?>
<section class="home-1">
    <div id="pixel-container"></div>
    <div id="overlay"></div>
    <div class="modal" id="paymentModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="totalAmountLabel"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>

                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>

                    <div class="form-group">
                        <label for="phone">Phone number:</label>
                        <input type="tel" class="form-control" id="phone" name="phone" required>
                    </div>

                    <div class="form-group">
                        <label for="city">City (Optional):</label>
                        <input type="text" class="form-control" id="city" name="city">
                    </div>

                    <div class="form-group">
                        <label for="state">State (Optional):</label>
                        <input type="text" class="form-control" id="state" name="state">
                    </div>

                    <div class="form-group">
                        <label for="country">Country (Optional):</label>
                        <input type="text" class="form-control" id="country" name="country">
                    </div>

                    <div class="form-group">
                        <label for="imageLocation">Image Upload</label>
                        <input type="file" class="form-control-file" id="imageLocation" name="imageLocation" accept="image/*" required>
                    </div>

                    <div class="form-group">
                        <label for="countotalAmountInputtry">Total Amount:</label>
                        <input type="text" class="form-control" id="totalAmountInput" name="totalAmountInput">
                    </div>

                    <!-- PayPal payment button -->
                    <div id="paypalButton">Pay with PayPal</div>
                </div>
            </div>
        </div>
    </div>
</section>
<script src="assets/js/custom/buypixels.js"></script>
<?=$this->include('templates/footer');?>