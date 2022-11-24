<link rel="stylesheet" href="/themes/ubt/css/app.min.css?v=20220912124640">

<style>
  .grecaptcha-badge {
    visibility: hidden;
  }
</style>
<script src="https://www.google.com/recaptcha/api.js?render={{ config('google.recaptcha_key') }}"></script>


<script src="/themes/ubt/js/plugins.min.js"></script>
<script src="/themes/ubt/js/tingle.min.js"></script>
<script src="/themes/ubt/js/main.min.js?v=20220912124629"></script>

<script src="https://cdn.polyfill.io/v2/polyfill.js?features=fetch"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script src="/themes/ubt/js/svgxuse.min.js"></script>
<!--[if IE 9]>
<script src="/themes/ubt/js/svg4everybody-min.js"></script>
<script>svg4everybody();</script>
<![endif]-->

<script>


if(document.getElementById('send-contact-form')){ 
  // Do captch and submit form
  grecaptcha.ready(function() {
        grecaptcha.execute(document.getElementById('contact-form').dataset['recaptcha'], {action: 'contact'}).then(function(token) {
          document.querySelector('input[name=g-recaptcha-response]').value = token;
          if(document.getElementById('email-signup')){
            document.querySelector('.newsletter-form input[name=g-recaptcha-response]').value = token;
          }
        });
  });

  document.getElementById('send-contact-form').addEventListener("click", function(e) {
    e.preventDefault();
      
    document.body.classList.remove('loaded');

    var url = '/contact';
    var email = document.querySelector('#contact-form [name=email]').value;
    var name = document.querySelector('#contact-form [name=name]').value;
    var telephone = document.querySelector('#contact-form [name=telephone]').value;
    var comments = document.querySelector('#contact-form [name=comments]').value;
    var token = document.querySelector('#contact-form [name=_token]').value;
    var recaptcha = document.querySelector('input[name=g-recaptcha-response]').value;

    fetch(url, {
      method: 'POST',
      body: JSON.stringify({ 'name': name, 'email': email, 'telephone': telephone, 'comments': comments, '_token': token, 'g-recaptcha-response': recaptcha }), 
      headers:{
        'Content-Type': 'application/json'
      }}).then(function(response) {  
      document.body.classList.add('loaded');  
      if (response.status !== 200) {  
        console.warn('Looks like there was a problem. Status Code: ' + 
          response.status);
        return;  
      }
      return response.json();
    }).then(function(data) {  
        if(data.status!='ok'){
          $errors = '';
          for (var i in data.errors) {
               $errors += data.errors[i][0]+'\n';
          }
          grecaptcha.execute(document.getElementById('contact-form').dataset['recaptcha'], {action: 'contact'}).then(function(token) {
            document.querySelector('input[name=g-recaptcha-response]').value = token;
          });
          if(typeof Swal !== 'undefined'){
            return Swal.fire({
              title: 'Whoops!',
              html: ('There was a problem with your sign up details\n\n'+$errors).replace(/\n/gi,'<br>'),
              icon: 'error',
              confirmButtonText: 'OK',
            });
          }
         
          return alert('There was a problem with your form\n\n'+$errors);
        }

        document.getElementsByClassName('contact-form')[0].reset();
        document.getElementsByClassName('contact-content')[0].classList.add('hidden');
        document.getElementsByClassName('thank-you')[0].classList.remove('hidden');
        document.getElementsByClassName('contact-details-form')[0].scrollIntoView(); 

        
        if(document.getElementById('email-signup')){
          grecaptcha.execute(document.querySelector('.newsletter-form').dataset['recaptcha'], {action: 'contact'}).then(function(token) {
             document.querySelector('.newsletter-form input[name=g-recaptcha-response]').value = token;
          });
        }
        
        // Trigger event tracking
        window.dataLayer = window.dataLayer || [];
        window.dataLayer.push({
          'event': 'General Enquiry Received'
        });

        // if(typeof fbq !== 'undefined'){
        //   fbq('track', 'Lead');
        //   fbq('track', 'CustomLead');
        // }


    }).catch(function(err) {  
        document.body.classList.add('loaded');
        console.error('Fetch Error -', err);  
        return alert('There was a problem sending your enquiry. Please call us or use our general contact email address.');
    });


  });
}



if(document.getElementById('email-signup')){    

  if(document.querySelector('.newsletter-form input[name=g-recaptcha-response]').value==""){
    grecaptcha.ready(function() {
      grecaptcha.execute(document.querySelector('.newsletter-form').dataset['recaptcha'], {action: 'contact'}).then(function(token) {
         document.querySelector('.newsletter-form input[name=g-recaptcha-response]').value = token;
      });
    });
  
  }
  
  document.getElementById('email-signup').addEventListener("click", function(e) {
    e.preventDefault();

    document.getElementById('email-signup').classList.add('preload');
    document.getElementById('email-signup').innerHTML = '<span class="btn-loading">Please wait<span>';
    document.getElementById('email-signup').disabled = true;

    var url = '/newsletter';
    var email = document.getElementById('newsletter-email').value;
    var forename = document.getElementById('newsletter-forename').value;
    var surname = document.getElementById('newsletter-surname').value;
    var token = '{{ csrf_token() }}';
    var newsletter_recaptcha = document.querySelector('.newsletter-form input[name=g-recaptcha-response]').value;

    fetch(url, {
      method: 'POST', // or 'PUT'
      body: JSON.stringify({ 'first_name': forename, 'last_name': surname, 'email': email, '_token': token, 'g-recaptcha-response':newsletter_recaptcha}), // data can be `string` or {object}!
      headers:{
        'Content-Type': 'application/json'
      }}).then(function(response) {  
      if (response.status !== 200) {  
        console.warn('Looks like there was a problem. Status Code: ' + 
          response.status);
        return;  
      }
      return response.json();
    }).then(function(data) {  
        document.getElementById('email-signup').classList.remove('preload');
        document.getElementById('email-signup').innerHTML = 'Signup';
        document.getElementById('email-signup').disabled = false;

        if(data.status!='ok'){
          $errors = '';
          for (var i in data.errors) {
               $errors += data.errors[i][0]+'\n';
          }
          grecaptcha.execute(document.querySelector('.newsletter-form').dataset['recaptcha'], {action: 'contact'}).then(function(token) {
             document.querySelector('.newsletter-form input[name=g-recaptcha-response]').value = token;
          });
          if(typeof Swal !== 'undefined'){
            return Swal.fire({
              title: 'Whoops!',
              html: ('There was a problem with your sign up details\n\n'+$errors).replace(/\n/gi,'<br>'),
              icon: 'error',
              confirmButtonText: 'OK',
            });
          } else {
            return alert('There was a problem with your sign up details\n\n'+$errors);
          }
        }

        document.getElementsByClassName('newsletter-form')[0].reset();
        // Trigger event tracking
        window.dataLayer = window.dataLayer || [];
        window.dataLayer.push({
          'event': 'Newsletter Signup'
        });

        if(typeof Swal !== 'undefined'){
          return Swal.fire({
              title: 'Thank you!',
              text: 'You\'re signed up!',
              icon: 'success',
              confirmButtonText: 'OK'
            });
        } else {
          return alert('Thank you!');
        }

    }).catch(function(err) {  
        console.error('Fetch Error -', err);  
        document.getElementById('email-signup').classList.remove('preload');
        document.getElementById('email-signup').innerHTML = 'Signup';
        document.getElementById('email-signup').disabled = false;
    });

  });


}

</script>