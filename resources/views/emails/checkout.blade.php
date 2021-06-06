<html>
    <head>
        <title>Checkout confirmed</title>
        <style>
        .button {
            background-color: orange;
            border: none;
            color: white;
            padding: 16px 32px;
            text-align: center;
            font-size: 16px;
            margin: 4px 2px;
            opacity: 0.6;
            transition: 0.3s;
            display: inline-block;
            text-decoration: none;
            cursor: pointer;
          }
          </style>
    </head>
    <body>
        <table align="center">
            <tr><td><h1>Checkout confirmed</h1></td></tr>
            <tr><td>&nbsp;</td></tr>
            <tr><td> Dear {{ $name }}, </td></tr>
            <tr><td>Your have successfully buy your ticket(s).</td></tr>
            <tr><td>Please click on below link to visit our website:</td></tr>
            <tr><td>&nbsp;</td></tr>
            <tr><td>
            <a href="{{ route('welcome') }}">
            <button  type="submit" class="button" style="text-align: center">Home</button></a>
        </td></tr>
            <tr><td>&nbsp;</td></tr>
            <tr><td> Thank your for using our application,</td></tr>
            <tr><td> Event Ticket Website </td></tr>
        </table>
    </body>
</html>