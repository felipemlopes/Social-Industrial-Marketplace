@include('admin.Emailtemplates.header')

<h3 style="font-family: 'Open Sans', 'Helvetica', Helvetica, Arial, sans-serif; font-size: 18px; line-height: 2em; font-weight: normal; margin: 0 auto 10px; padding: 0;">

    Hello {{$name}},

</h3>

<p style="font-family: 'Open Sans', 'Helvetica', Helvetica, Arial, sans-serif; font-size: 15px; line-height: 1.6em; font-weight: normal; margin: 0 auto 10px; padding: 0;">

    Your Company Page has been claimed on Indy John by {{$fullName}}. If you have any questions, please contact the support team.

    <br /><br />


</p>

@include('admin.Emailtemplates.footer')
