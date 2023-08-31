import React from "react";
import * as ReactDOM from "react-dom/client";
import App from "./App.jsx";
import "./index.css";

const reactApp = ReactDOM.createRoot(document.getElementById("root"));

reactApp.render(
  <React.StrictMode>
    <App />
  </React.StrictMode>
);
