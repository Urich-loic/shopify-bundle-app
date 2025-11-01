const API_URL = "http://localhost:8000/api";

export async function getProducts() {
  const res = await fetch(`${API_URL}/products`);
  return res.json();
}

export async function createBundle(bundleData) {
  const res = await fetch(`${API_URL}/bundle`, {
    method: "POST",
    headers: { "Content-Type": "application/json" },
    body: JSON.stringify(bundleData),
  });
  return res.json();
}

export async function getBundles() {
  const res = await fetch(`${API_URL}/bundles`);
  return res.json();
}
