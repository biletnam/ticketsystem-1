{extends "base.tpl"}
{block "title"}Dashboard{/block}
{block "content"}
    <main class="container" role="main">
        <div class="mt-1">
            <h1>Ticket #{$ticket.ticketsID}</h1>
        </div>
        <p class="lead">
            {$ticket.message}
        </p>
        <form method="post">
        <textarea name="message" class="lead">
            {$ticket.message}
        </textarea>
        <div class="form-group">
            <button type="submit" class="btn btn-block btn-primary" name="editTicket">
                <i class="glyphicon glyphicon-open-file"></i> Ticket bearbeiten
            </button>
            <button type="submit" class="btn btn-block btn-primary" name="closeTicket">
                <i class="glyphicon glyphicon-open-file"></i> Ticket schließen
            </button>
        </div>
        </form>
    </main>
{/block}