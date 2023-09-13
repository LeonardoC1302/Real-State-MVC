<main class="container section">
    <h1>Contact</h1>

    <?php if($message) { ?>
        <p class='alert success'>  <?php echo $message; ?> </p>;
    <?php } ?>

    <picture>
        <source srcset="build/img/destacada3.webp" type="image/webp">
        <source srcset="build/img/destacada3.jpg" type="image/jpeg">
        <img loading="lazy" src="build/img/destacada3.jpg" alt="Contact Image">
    </picture>

    <h2>Fill The Contact Form</h2>

    <form class="form" action="/contact" method="POST">
        <fieldset>
            <legend>Personal Information</legend>
            <label for="name">Name</label>
            <input type="text" placeholder="Your Name" id="name" name="contact[name]" required>

            <label for="msg">Message</label>
            <textarea id="msg" name="contact[message]" required></textarea>
        </fieldset>

        <fieldset>
            <legend>Property Information</legend>
            <label for="options">Buy Or Sell: </label>
            <select id="options" name="contact[type]" required>
                <option value="" disabled selected>-- Select --</option>
                <option value="Buy">Buy</option>
                <option value="Sell">Sell</option>
            </select>

            <label for="price">Price or Budget</label>
            <input type="number" placeholder="Your Price or Budget" id="price" min="0"
            name="contact[price]" required>
        </fieldset>

        <fieldset>
            <legend>Contact</legend>
            <p>How do you want to be contacted?</p>
            <div class="contact-option">
                <label for="phone-contact">Phone</label>
                <input type="radio" value="phone" id="phone-contact" name="contact[contact]" 
                required>

                <label for="email-contact">E-Mail</label>
                <input type="radio" value="email" id="email-contact" name="contact[contact]"
                required>
            </div>

            <div id="contact"></div>
        </fieldset>
        <input type="submit" value="Send" class="green-button">
    </form>
</main>