{extends "base.tpl"}
{block "title"}Dashboard{/block}
{block "content"}    

    <div class="starter-template">
        <h1>Hallo {$user.firstname} {$user.lastname}</h1>
        Sie sind angemeldet als {$user.role}. <br>
        Ihre UserID lautet: {$user.userID}. <br>
        <form method="post">
        <button name="getTicket" type="submit" class="btn btn-primary">Ticket erhalten</button>
        </form>
    </div>
{/block}