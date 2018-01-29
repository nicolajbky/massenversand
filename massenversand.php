<!DOCTYPE html>
<html lang="de">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Massenversand</title>
  </head>
  <body>
      <h1>Massenversand</h1>


      <form action="senden.php" method="post" autocomplete="off">

      <table border="0">
        <tr><td>Sender:</td>          <td><input type="text" id="sender" name="sender" placeholder="Sender" required></td></tr>
        <tr><td>Empf&auml;nger:</td>  <td><input type="tel" id="receiver" name="receiver" " placeholder="0123-123456789" required></td></tr>
        <tr><td>Startdatum:</td>      <td><input id="startdate" name="startdate" type="date"  required>Format: 2018-01-28</td></tr>
        <tr><td>Enddatum:</td>        <td><input id="enddate" name="enddate" type="date"  required>Format: 2018-01-28</td></tr>
        <tr><td>Uhrzeit:</td>         <td><input id="time" name="time" type="time" placeholder="20:00" required></td></tr>
        <tr><td>Nachricht:</td>       <td><textarea id="message" name="message" cols="40" rows="15" placeholder="Nachrichtentext" required></textarea></td></tr>
        <tr><td></td>                 <td></td></tr>
        <tr><td>Benutzer-ID:</td>     <td><input type="text" id="userID" name="userID" placeholder="USERID"  required></td></tr>
        <tr><td>Passwort:</td>        <td><input id="pw" type="password" name="password" placeholder="password" value="" required></td></tr>
        <tr><td>TEST</td>             <td><input type="checkbox" name="test" value="1" checked><b style="color:Tomato;">&lt;-- Zum Senden deaktivieren!</b></td></tr>
      </table>

          <p style="color:Tomato;">Nach dem Klicken bitte etwas Geduld haben :-)</p>
        <input type="button" name="senden" value="Geplante SMS anlegen" onClick="this.form.submit(); this.disabled=true; this.value='Sending…'; " >
      </form>

  </body>
  </html>
