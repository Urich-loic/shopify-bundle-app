import React from "react";
import { Page, Card, Button, Text, AppProvider } from "@shopify/polaris";
import ProductList from "../components/ProductList";
import BundleForm from "../components/BundleForm";
import BundleList from "../components/BundleList";
export default function Home() {
  return (
    <>
      <Page title="BundleUp MVP 🚀">
      <Card sectioned>
        <Text variant="headingMd" as="h2">
          Crée ton bundle
        </Text>
        <BundleForm />
      </Card>

      <Card title="Produits disponibles" sectioned>
        <ProductList />
      </Card>

      <Card title="Bundles créés" sectioned>
        <BundleList />
      </Card>
    </Page>
    </>
  );
}
