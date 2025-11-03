  <s-section>
   <s-heading>Product list</s-heading>
     <s-table>
    <s-table-header-row>
      <s-table-header>Product</s-table-header>
      <s-table-header>vendor</s-table-header>
      <s-table-header format="numeric">Body</s-table-header>
      <s-table-header>Phone</s-table-header>
    </s-table-header-row>
    <s-table-body>
    @foreach($products['products'] as $product)
     <s-table-row>
        <s-table-cell>{{ $product['title'] }}</s-table-cell>
        <s-table-cell>{{ $product['vendor'] }}</s-table-cell>
        <s-table-cell>{{ $product['body_html'] }}</s-table-cell>
      </s-table-row>
    @endforeach
     </s-table-body>
  </s-table>
</s-section>
</s-section>
