{extends "base.tpl"}
{block "title"}Dashboard{/block}
{block "content"}
    {if $user.role == Supporter}
        <div class="starter-template">
            <h1>Sie haben nicht die nötige Berechtigung.</h1>
        </div>
    {elseif $user.role == Admin || $user.role == Manager}
        <div class="container">
            <form class="form-signin" method="post">
                <h2 class="form-signin-heading">Nutzer anlegen</h2>
                <label for="inputEmail" class="sr-only">Email address</label>
                <input name="email" type="email" id="inputEmail" class="form-control" placeholder="E-Mail" required=""
                       autofocus="">
                <label for="inputPassword" class="sr-only">Password</label>
                <input name="password" type="password" id="inputPassword" class="form-control" placeholder="Passwort"
                       required="">
                <label for="inputPassword" class="sr-only">Password</label>
                <input name="firstname" type="text" class="form-control" placeholder="Vorname" required="">
                <label for="inputPassword" class="sr-only">Password</label>
                <input name="lastname" type="text" class="form-control" placeholder="Nachname" required="">
                <label for="inputPassword" class="sr-only">Password</label>
                <label>Rolle
                    <select name="role" size="1">
                        <option value="Manager">Manager</option>
                        {if $user.role == Admin}
                        <option value="Admin">Admin</option>
                        {/if}
                    </select>
                </label>
                <button class="btn btn-lg btn-primary btn-block" type="submit" name="createUser">Nutzer anlegen</button>
            </form>
        </div>
    {/if}
{/block}