@extends('dashboards.users.layouts.user-dash-layout')
@section('title','3mimport')

@section('content')

<div class="card">
              <div class="card-header">
                <h3 class="card-title">3m Excel</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="import3m" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>ORDER_ID</th>
                    <th>ITEM_ID</th>
                    <th>REQUESTED</th>
                    <th>CONFIRMED</th>
                    <th>TO_BE_CONF</th>
                    <th>PRODUCT_ID</th>
                    <th>ZZ_VC_DES</th>
                    <th>QUANTITY</th>
                    <th>QUANTITY_UNIT</th>
                    <th>DELIVERY_DATE</th>
                    <th>DELIVERY_TIME</th>
                    <th>REQ_PRICE</th>
                    <th>CONF_PRICE</th>
                    <th>CMP_ID</th>
                    <th>CMP_PRODUCT_ID</th>
                    <th>CMP_QUANTITY</th>
                    <th>CMP_QUANTITY_UNIT</th>
                    <th>CMP_BATCH_ID</th>
                    <th>REV_LEVEL_ITEM</th>
                    <th>CURRENCY</th>
                    <th>PRICE_BASE_QUANTITY</th>
                    <th>PRICE_BASE_QUANTITY_UNIT</th>
                    <th>SALES_ORDER_REFERENCE</th>
                    <th>REQ_MPN</th>
                    <th>CONF_MPN</th>
                    <th>REQ_MFR</th>
                    <th>CONF_MFR</th>
                    <th>CUST_LOC_ID</th>
                    <th>DELIVERY_TZONE</th>
                    <th>SHIPPING DATE</th>
                    <th>CMP_REV_LEVEL</th>
                    <th>CMP_REQ_DATE</th>
                    <th>SHIPPING_TIME</th>
                    <th>SHIPPING TZONE</th>

                  </tr>
                  </thead>
                  <tbody>
            
                  <tr>
                  <td>PO No.</td>
                  <td>PO Item No.</td>
                  <td>Requested</td>
                  <td>Confirmed</td>
                  <td>To Be Confirmed</td>
                  <td>Product</td>
                  <td>VC Description</td>
                  <td>Quantity</td>
                  <td>UoM</td>
                  <td>Deliv. Date</td>
                  <td>Deliv.Time</td>
                  <td>Requested Price</td>
                  <td>Confirmed Price</td>
                  <td>Component ID</td>
                  <td>Product</td>
                  <td>Qty</td>
                  <td>UoM</td>
                  <td>Cust. Batch</td>
                  <td>RevLvl</td>
                  <td>Crcy</td>
                  <td>PrU.</td>
                  <td>PrUoM</td>
                  <td>Reference Document Number of Sales Order</td>
                  <td>Requested MPN</td>
                  <td>Confirmed MPN</td>
                  <td>Requested Mfr</td>
                  <td>Confirmed Mfr</td>
                  <td>Customer Loc.</td>
                  <td>DlvTZ</td>
                  <td>Ship. Date</td>
                  <td>RevLvl</td>
                  <td>Requirement Date</td>
                  <td>Ship. Time</td>
                  <td>ShipTZ</td>           
                  </tr>
                  @foreach ($sipariss as $siparis)
                  <tr>
                      <td>{{$siparis->siparis_no}}</td>
                      <td>10</td>
                      <td></td>
                      <td></td>
                      <td>X</td>
                      <td>{{$siparis->siparis_urunkod}}</td>
                      <td>{{$siparis->urun_Ad}}</td>
                      <td>{{$siparis->siparis_miktar}}</td>
                      <td>EA</td>
                      <td>{{$siparis->siparis_sevktarih}}</td>
                      <td>00:00:00</td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td>{{$siparis->siparis_hammaddekod}}</td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>

                  </tr>
                  <tr>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>

                  </tr>
                  @endforeach
             
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>ORDER_ID</th>
                    <th>ITEM_ID</th>
                    <th>REQUESTED</th>
                    <th>CONFIRMED</th>
                    <th>TO_BE_CONF</th>
                    <th>PRODUCT_ID</th>
                    <th>ZZ_VC_DES</th>
                    <th>QUANTITY</th>
                    <th>QUANTITY_UNIT</th>
                    <th>DELIVERY_DATE</th>
                    <th>DELIVERY_TIME</th>
                    <th>REQ_PRICE</th>
                    <th>CONF_PRICE</th>
                    <th>CMP_ID</th>
                    <th>CMP_PRODUCT_ID</th>
                    <th>CMP_QUANTITY</th>
                    <th>CMP_QUANTITY_UNIT</th>
                    <th>CMP_BATCH_ID</th>
                    <th>REV_LEVEL_ITEM</th>
                    <th>CURRENCY</th>
                    <th>PRICE_BASE_QUANTITY</th>
                    <th>PRICE_BASE_QUANTITY_UNIT</th>
                    <th>SALES_ORDER_REFERENCE</th>
                    <th>REQ_MPN</th>
                    <th>CONF_MPN</th>
                    <th>REQ_MFR</th>
                    <th>CONF_MFR</th>
                    <th>CUST_LOC_ID</th>
                    <th>DELIVERY_TZONE</th>
                    <th>SHIPPING DATE</th>
                    <th>CMP_REV_LEVEL</th>
                    <th>CMP_REQ_DATE</th>
                    <th>SHIPPING_TIME</th>
                    <th>SHIPPING TZONE</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection