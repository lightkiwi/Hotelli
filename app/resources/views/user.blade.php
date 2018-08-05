<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Hotelli - Administration</title>

</head>
<body>
<h1>user create</h1>

<div class="flex-center position-ref full-height">
    <div class="content">
        <form method="POST" action="{{ config('app.url')}}/user">
            @csrf
            <h1> Enter Details to create a product</h1>
            <div class="form-input">
                <label>first_name</label> <input type="text" name="first_name">
            </div>

            <div class="form-input">
                <label>last_name</label> <input type="text" name="last_name">
            </div>

            <div class="form-input">
                <label>email</label> <input type="text" name="email">
            </div>

            <div class="form-input">
                <label>phone</label> <input type="text" name="phone">
            </div>

            <div class="form-input">
                <label>password</label> <input type="text" name="password">
            </div>

            <div class="form-input">
                <label>id_address</label> <input type="text" name="id_address">
            </div>

            <div class="form-input">
                <label>id_profil</label> <input type="text" name="id_profil">
            </div>

            <div class="form-input">
                <label>id_gender</label> <input type="text" name="id_gender">
            </div>

            <div class="form-input">
                <label>rgpd_date</label> <input type="text" name="rgpd_date">
            </div>

            <div class="form-input">
                <label>newsletter</label> <input type="text" name="newsletter">
            </div>

            <div class="form-input">
                <label>ip_address</label> <input type="text" name="ip_address">
            </div>

            <div class="form-input">
                <label>user_agent</label> <input type="text" name="user_agent">
            </div>

            <button type="submit">Submit</button>
        </form>
    </div>
</div>

</body>
</html>
