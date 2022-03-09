/**
 * Validate and submit the registration form.
 */
$("#create form").validate({
    rules: {
        email: {
            required: true,
            email: true
        },
        nom: "required",
        prenom: "required",
        sexe:"required",
        adresse:"required",
        portable:"required",
        photo:"required",
        date_nais:"required",
        mot_de_passe: {
            required: true,
            minlength: 6
        },
        password_confirmation: "required",
        bot_protection: "required"
    },
    submitHandler: function(form) {
        AS.Http.submit(form, getRegisterFormData(form), function (response) {
            AS.Util.displaySuccessMessage($(form), response.message);
        });
    }
});

/**
 * Get registration form data as JSON.
 * @param form
 */
function getRegisterFormData(form) {
    return {
        action: "registerUser",
        user: {
            email: form['email'].value,
            nom: form['nom'].value,
            prenom: form['prenom'].value,
            sexe: form['sexe'].value,
            adresse: form['adresse'].value,
            portable: form['portable'].value,
            photo: form['photo'].value,
            date_nais: form['date_nais'].value,
            mot_de_passe: AS.Util.hash(form['mot_de_passe'].value),
            password_confirmation: AS.Util.hash(form['password_confirmation'].value),
            bot_protection: form['bot_protection'].value
        }
    };
}
