import React, { useEffect, useState } from "react";
import { ResourceList, Spinner } from "@shopify/polaris";
import { getProducts } from "../api/api";

function ProductList() {
  const [products, setProducts] = useState([]);
  const [loading, setLoading] = useState(true);

  useEffect(() => {
    getProducts().then((data) => {
      setProducts(data.products || []);
      setLoading(false);
    });
  }, []);

  if (loading) return <Spinner accessibilityLabel="Chargement" />;

  return (
    <ResourceList
      items={products}
      renderItem={(item) => (
        <ResourceList.Item id={item.id}>
          <TextStyle variation="strong">{item.title}</TextStyle>
        </ResourceList.Item>
      )}
    />
  );
}

export default ProductList;
