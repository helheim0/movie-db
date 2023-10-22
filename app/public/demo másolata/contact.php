<?php require_once("./includes/header.php"); ?>

        <h1 class="text-center p-5 pt-0">Contact</h1>
        <div class="row">
            <div class="col-6 text-bg-dark p-4 d-flex flex-column justify-content-between rounded-1">
                <div class="d-flex flex-column">
                    <h3>Let's talk!</h3>
                    <h6 class="me-lg-5">Feel free to contact us with questions or inquiries regarding movies, movie review and many more. We are happy to talk to you and do our best to make your experience pleasant!</h6>   
                </div>
                <div class="d-flex align-items-lg-start flex-row justify-content-start">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-envelope me-2" viewBox="0 0 16 16">
                        <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z"/>
                    </svg>
                    <p>hello@email.com</p>
                </div>
            </div>
            <div class="col-6">
                <form>
                    <div class="form-floating mb-3">
                        <input type="text" id="name" class="form-control" placeholder="Name"/>
                        <label for="name" class="form-label">Name</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="email" id="email" class="form-control" placeholder="Email"/>
                        <label for="email" class="form-label">Email</label>
                    </div>
                    <div class="form-floating mb-3">
                        <textarea id="floatingTextarea" class="form-control" placeholder="Your message"></textarea>
                        <label for="floatingTextarea" class="form-label">Message</label>
                    </div>
                    <button type="submit" class="btn btn-outline-dark float-end">Send</button>
                </form>
            </div>
        </div>
<?php require_once("./includes/footer.php"); ?>
