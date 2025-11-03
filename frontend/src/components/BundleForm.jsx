import {Card, Form, FormLayout, TextField, Button} from '@shopify/polaris';
import {useState} from 'react';
import axios from 'axios';

export default function BundleForm() {
  const [title, setTitle] = useState('');
  const [productIds, setProductIds] = useState('');

  const handleSubmit = () => {
    axios.post('https://9dc4962bcd12.ngrok-free.app/api/bundles', {
      title,
      product_ids: productIds.split(',').map(id => id.trim())
    }).then(res => {
      alert('Bundle créé !');
    });
  };

  return (
    <Card sectioned title="Créer un Bundle">
      <Form onSubmit={handleSubmit}>
        <FormLayout>
          <TextField
            label="Titre du bundle"
            value={title}
            onChange={setTitle}
          />
          <TextField
            label="IDs produits (séparés par des virgules)"
            value={productIds}
            onChange={setProductIds}
          />
          <Button submit>Créer</Button>
        </FormLayout>
      </Form>
    </Card>
  );
}
