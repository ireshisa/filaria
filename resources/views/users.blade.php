
        <h1>User Register page</h1>
        <form action="/register" method="post">
        {{csrf_field() }}
            <input type='text' name="name"/>
            <br>
            <input type='email' name="email"/>
            <br>
            <input type='password' name="password"/>
            <br>
            <input type='submit' name="Register now"/>
        </form> 
   