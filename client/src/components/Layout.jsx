import React from "react";
import { Outlet } from "react-router-dom";

import Header from "./Header";
import Footer from "./Footer";

const Layout = () => {
  return (
    <>
      <div className="container mx-auto flex flex-col min-h-screen">
        <Header />

        <main className="flex-1 container mx-auto my-10">
          <Outlet />
        </main>

        <Footer />
      </div>
    </>
  );
};

export default Layout;
