import { Card, ResourceList } from "@shopify/polaris";
import { useEffect, useState } from "react";
import axios from "axios";

export default function ProductList() {
  const [products, setProducts] = useState([]);

  useEffect(() => {
    axios
      .get("https://9dc4962bcd12.ngrok-free.app/api/products", {
        withCredentials: false,
        headers: {
          Accept: "application/json",
          "X-Requested-With": "XMLHttpRequest",
          "Access-Control-Allow-Origin": "*",
          "Content-Type": "application/json",
          // "Authorization": `Bearer ${token}`, // si tu utilises un token
        },
      })
      .then((res) => {
        console.log(res);
        setProducts(res.products || []);
      });
  }, []);

  return (
    <Card title="Produits">
      <ResourceList
        items={products}
        renderItem={(item) => (
          <ResourceList.Item id={item.id}>
            <TextStyle variation="strong">{item.title}</TextStyle>
          </ResourceList.Item>
        )}
      />
    </Card>
  );
}
