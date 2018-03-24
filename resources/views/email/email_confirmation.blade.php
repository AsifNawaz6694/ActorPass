<h1>Welcome to OnlineClass </h1>
<p>Hi, {{ $fullname }}</p>
<p>Thank you for Joining Actor Pass</p>
<p>Please Click on the Link below to verify your Account on Actor Pass. </p>
<a href="{{ route('email_verify_post', ['email_token' => $email_token]) }}">Verify My Account</a>
