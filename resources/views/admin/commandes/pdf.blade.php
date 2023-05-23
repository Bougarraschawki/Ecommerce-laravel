<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Commande</title>
    <style>
      .title{
        text-align: center;
      }
      .total{
        text-align: center;
        background-color: #dddddd;
      }
      .date{
        position: absolute;
        float: right;
        top: 70px;
      }
      table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
      }
      
      td, th {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
      }
      
      tr:nth-child(even) {
        background-color: #dddddd;
      }
      </style>
  </head>
  <body>
    <h1 class="title">Commande</h1>
    <h4>Client: {{$commande->client->name}}</h4>
    <p class="date"><b>Date:</b> {{$commande->created_at}}</p>
    <table>
      <tr>
        <th>Produit</th>
        <th>Quantité</th>
        <th>Prix</th>
      </tr>
      @foreach ($commande->lignecommandes as $Lc)
        <tr>
          <td>{{$Lc->product->name}}</td>
          <td>{{$Lc->qte}}</td>
          <td>{{$Lc->product->price}}</td>
        </tr>
      @endforeach
        <tr>
          <td colspan="3" class="total">
            <b>Total:</b> {{$commande->getTotal()}} TND
          </td>
        </tr> 
    </table>
  <p>NB: Livraison <b>10dt</b> déja inclue</p> 
  </body>
</html>