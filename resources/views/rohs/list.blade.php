 <style type="text/css">
  a{
    text-decoration: none;
  }
.table{
  border-spacing: 1;
  border-radius: 6px;
  overflow: hidden;
  max-width: 800px;
  width: 100%;
  margin: 0 auto;
  margin-bottom: 10px;
  }
table {
  border-spacing: 1;
  border-collapse: collapse;
  background: white;
  border-radius: 6px;
  overflow: hidden;
  max-width: 800px;
  width: 100%;
  margin: 0 auto;
  position: relative;
}
table * {
  position: relative;
}
table td, table th {
  padding-left: 8px;
}
table thead tr {
  height: 60px;
  background: #FFED86;
  font-size: 16px;
}
table tbody tr {
  height: 48px;
  border-bottom: 1px solid #E3F1D5;
}
table tbody tr:last-child {
  border: 0;
}
table td, table th {
  text-align: left;
}
table td.l, table th.l {
  text-align: right;
}
table td.c, table th.c {
  text-align: center;
}
table td.r, table th.r {
  text-align: center;
}

@media screen and (max-width: 35.5em) {
  table {
    display: block;
  }
  table > *, table tr, table td, table th {
    display: block;
  }
  table thead {
    display: none;
  }
  table tbody tr {
    height: auto;
    padding: 8px 0;
  }
  table tbody tr td {
    padding-left: 45%;
    margin-bottom: 12px;
  }
  table tbody tr td:last-child {
    margin-bottom: 0;
  }
  table tbody tr td:before {
    position: absolute;
    font-weight: 700;
    width: 40%;
    left: 10px;
    top: 0;
  }
  table tbody tr td:nth-child(1):before {
    content: "Code";
  }
  table tbody tr td:nth-child(2):before {
    content: "Stock";
  }
  table tbody tr td:nth-child(3):before {
    content: "Cap";
  }
  table tbody tr td:nth-child(4):before {
    content: "Inch";
  }
  table tbody tr td:nth-child(5):before {
    content: "Box Type";
  }
}
body {
  background: #9BC86A;
  font: 400 14px 'Calibri','Arial';
  padding: 20px;
}
.button{
  float:right;
  padding: 8px;
  border-radius: 5px;
  background: #FFED86;
  font-weight: bold;
  color:black;
}

</style>
<div class="table">
  <button class="button"><a href="{{url('rohs-create')}}">Add Substance</a></button>
  <button class="button"><a href="{{url('logout')}}">Logout</a></button>
</div>
<table>
<thead>
<tr>
  <th>S.No</th>
  <th>SUBSTANCE NAME</th>
  <th>CASNO</th>
  <th>THRESHOLD</th>
  <th>Edit</th>
  <th>Delete</th>
</tr>
<thead>
<tbody>
	<?php $i=0;?>
	@foreach($reach_rohs_list as $reach_rohs)
	<?php $i++;?>
<tr>
  <td>{{ $i }}</td>
  <td>{{ $reach_rohs->ipc_name }}</td>
  <td>{{ $reach_rohs->cas_no }}</td>
  <td>{{ $reach_rohs->threshold_value.' '.$reach_rohs->threshold_unit }}</td>
  <td>
  	<a href="{{ route('rohs.edit', $reach_rohs->chemical_id) }}">Edit</a>
  </td>
  <td><a href="{{ route('rohs.delete', $reach_rohs->chemical_id) }}">Delete</a></td>
</tr>
@endforeach
</tbody>
<table/>