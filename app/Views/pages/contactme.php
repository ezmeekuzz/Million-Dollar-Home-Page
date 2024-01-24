<?=$this->include('templates/header');?>
    <section class="main-section">
        <div class="inner-section contact-section">
            <h2>Get In Touch</h2>
            <p>Want to get in touch? We'd love to hear from you.  Fill out the form with your Inquiry .</p>
            <div class="contact-form">
                <h2>Contact Us</h2>
                <form action="#">

                    <label for="first-name" class="first-name">
                      <input type="text" name="first-name" id="first-name" placeholder="First Name">
                    </label>

                    <label for="last-name" class="last-name">
                        <input type="text" name="last-name" id="last-name" placeholder="Last Name">
                    </label>

                    <label for="email" class="email">
                      <input type="email" name="email" id="email" placeholder="Email">
                    </label>

                    <label for="message" class="message">
                      <textarea name="message" id="" cols="30" rows="10" placeholder="Message"></textarea>
                    </label>

                    <input type="submit" value="Submit" name="submit" id="submit">

                  </form>
            </div>
        </div>
    </section>
<?=$this->include('templates/footer');?>