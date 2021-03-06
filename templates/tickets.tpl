{extends "base.tpl"}
{block "title"}Dashboard{/block}
{block "content"}
<main role="main" class="container">
    <div class="container">
        {if $user.role == Supporter}
        <h2>Ihr Ticket</h2>
        <table class="table table-sm table-striped">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>E-Mail</th>
                <th>Nachricht</th>
                <th>Zugewiesen an</th>
                <th>Beendet</th>
            </tr>
            </thead>
            <tbody>
            {foreach $userTicket userTicket}
                <tr>
                    <td><a href="/ticketsystem/ticketdetail.php?id={$userTicket.ticketsID}">{$userTicket.ticketsID}</td>
                    <td>{$userTicket.name}</td>
                    <td>{$userTicket.email}</td>
                    <td>{$userTicket.message}</td>
                    <td>{$userTicket.isAssignedTo}</td>
                    <td>{$userTicket.isFinished}</td>
                </tr>
            {/foreach}
            </tbody>
        </table>
        {else}
        <h2>Alle Tickets</h2>
        <table class="table table-sm table-striped">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>E-Mail</th>
                <th>Nachricht</th>
                <th>Zugewiesen an</th>
                <th>Beendet</th>
            </tr>
            </thead>
            <tbody>
            {foreach $tickets ticket}
            <tr>
                <td><a href="/ticketsystem/ticketdetail.php?id={$ticket.ticketsID}">{$ticket.ticketsID}</td>
                <td>{$ticket.name}</td>
                <td>{$ticket.email}</td>
                <td>{$ticket.message}</td>
                <td>{$ticket.isAssignedTo}</td>
                <td>{$ticket.isFinished}</td>
            </tr>
            {/foreach}
            </tbody>
        </table>
        {/if}
</main><!-- /.container -->
{/block}