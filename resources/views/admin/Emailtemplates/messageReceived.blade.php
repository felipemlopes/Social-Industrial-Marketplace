@include('admin.Emailtemplates.header')


   <h3 style="font-family: 'Open Sans', 'Helvetica', Helvetica, Arial, sans-serif; font-size: 18px; line-height: 2em; font-weight: normal; margin: 0 auto 10px; padding: 0;">Hello {{$name}},</h3> 
   

  <p style="font-family: 'Open Sans', 'Helvetica', Helvetica, Arial, sans-serif; font-size: 15px; line-height: 1.6em; font-weight: normal; margin: 0 auto 10px; padding: 0;">

You have received a message from {{$sender_first_name}} {{$sender_last_name}} on IndyJohn.com. <br /><br />

<strong>Message Details: </strong><br />
{{$message_detail}}
<br /><br />

<a href="http://indyjohn.com/auth/login">Log In to Indy John</a> to view the complete message and respond.<br /><br />
Remember to network more efficiently by sharing your Indy John profile with friends and associates.


</p>

@include('admin.Emailtemplates.footer')
