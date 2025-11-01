import React, { useState } from "react";
import { Form, FormLayout, TextField, Button } from "@shopify/polaris";
import { createBundle } from "../api/api";

function BundleForm() {
  const [title, setTitle] = useState("");

  const handleSubmit = async () => {
    await createBundle( title );
    alert("Bundle créé !");
    setTitle("");
  };

  return (
    <Form onSubmit={handleSubmit}>
      <FormLayout>
        <TextField
          label="Nom du bundle"
          value={title}
          onChange={setTitle}
          autoComplete="off"
        />
        <Button submit primary>
          Créer
        </Button>
      </FormLayout>
    </Form>
  );
}

export default BundleForm;
