<?=$this->include('templates/header');?>
<section class="home-1">
    <div id="pixel-container"></div>
    <div id="overlay"></div>
    <div class="modal fade" id="paymentModal" tabindex="-1" role="dialog" aria-labelledby="paymentModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="paymentModalLabel"></h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3 form-group">
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Name (Required)" autofocus required>
                                </div>
                                <div class="mb-3 form-group">
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Email (Required)" required>
                                </div>
                                <div class="mb-3 form-group">
                                    <input type="tel" class="form-control" id="phone" name="phone" placeholder="Phone number (Required)" required>
                                </div>
                                <div class="mb-3 form-group">
                                    <input type="text" class="form-control" id="city" name="city" placeholder="City (Optional)">
                                </div>
                                <div class="mb-3 form-group">
                                    <input type="text" class="form-control" id="state" name="state" placeholder="State (Optional)">
                                </div>
                                <div class="mb-3 form-group">
                                    <input type="text" class="form-control" id="country" name="country" placeholder="Country (Optional)">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3 form-group">
                                    <input type="file" class="form-control" id="imageLocation" name="imageLocation" accept="image/*" required>
                                    <span style="font-style: italic; font-size: 12px;">By continuing to proceed with payment, the user accepts that they have read and agreed to the <a href="terms-and-conditions" target="_blank">Terms and Conditions</a>.</span>
                                </div>
                                <div class="mb-3 form-group" hidden>
                                    <input type="text" class="form-control" id="totalAmountInput" name="totalAmountInput" readonly placeholder="Total Amount">
                                </div>
                                <div id="paypalButton" class="mb-3 form-group"></div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<script src="assets/js/custom/buypixels.js"></script>
<?=$this->include('templates/footer');?>