import React, { useEffect, useState } from "react";
import { ResourceList, Spinner } from "@shopify/polaris";
import { getBundles } from "../api/api";

function BundleList() {
  const [bundles, setBundles] = useState([]);
  const [loading, setLoading] = useState(true);

  useEffect(() => {
    getBundles().then((data) => {
      setBundles(data.bundles || []);
      setLoading(false);
    });
  }, []);

  if (loading) return <Spinner />;

  return (
    <ResourceList
      items={bundles}
      renderItem={(bundle) => (
        <ResourceList.Item id={bundle.id}>
          <TextStyle variation="strong">{bundle.title}</TextStyle>
        </ResourceList.Item>
      )}
    />
  );
}

export default BundleList;
