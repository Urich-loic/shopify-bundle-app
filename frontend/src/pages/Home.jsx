import React from "react";
import "@shopify/polaris/build/esm/styles.css";
import { AppProvider, Page, Card, Text } from "@shopify/polaris";

export default function Home() {
  return (
    <>
      <AppProvider>
        <Page title="Bonjour Shopify 🚀">
          <Card sectioned>
            <Text as="h2" variant="headingMd">
              Bienvenue dans ton app Shopify !
            </Text>
            <Text>Ceci est ton premier écran créé avec Shopify Polaris 💎</Text>
          </Card>
        </Page>
      </AppProvider>
    </>
  );
}
