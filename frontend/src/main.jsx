import { createRoot } from "react-dom/client";
import App from "./App";
import "@shopify/polaris/build/esm/styles.css";
import { AppProvider } from "@shopify/polaris";

createRoot(document.getElementById("root")).render(
  <AppProvider>
    <App />
  </AppProvider>
);
