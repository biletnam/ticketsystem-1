{extends "base.tpl"}
{block "title"}Dashboard{/block}
{block "content"}    
    <div class="starter-template">
        <h1>Hallo {$firstname} {$lastname}</h1>
        Sie sind angemeldet als {$role}. <br>
        Ihre UserID lautet: {$userID}. <br>
        <button name="getTicket" type="button" class="btn btn-primary">Ticket erhalten</button>
    </div>
{/block}