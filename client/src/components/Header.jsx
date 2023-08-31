import React, { useState } from "react";
import { NavLink } from "react-router-dom";

const Header = () => {
  const [isMenuOpen, setMenuOpen] = useState(false);

  return (
    <header className="bg-gradient-to-r from-sky-400 to-sky-600 p-5 shadow-lg rounded-lg">
      <div className="container mx-auto flex justify-between items-center">
        <NavLink
          to="/"
          className="text-white font-bold text-2xl hover:text-gray-100"
        >
          Exapp
        </NavLink>
        <nav className={`${isMenuOpen ? "" : "hidden"} md:block`}>
          <ul className="flex space-x-6">
            <li className="transition-transform transform hover:scale-105">
              <NavLink
                to="/"
                className="text-white hover:text-gray-100 px-2 py-1 rounded transition-colors"
              >
                Home
              </NavLink>
            </li>
            <li className="transition-transform transform hover:scale-105">
              <NavLink
                to="/about"
                className="text-white hover:text-gray-100 px-2 py-1 rounded transition-colors"
              >
                About
              </NavLink>
            </li>
            <li className="transition-transform transform hover:scale-105">
              <NavLink
                to="/contacts"
                className="text-white hover:text-gray-100 px-2 py-1 rounded transition-colors"
              >
                Contact
              </NavLink>
            </li>
            <li className="transition-transform transform hover:scale-105">
              <NavLink
                to="/register"
                className="text-white hover:text-gray-100 px-2 py-1 rounded transition-colors"
              >
                Register
              </NavLink>
            </li>
          </ul>
        </nav>
        <button
          className="md:hidden px-3 py-1 text-white rounded hover:text-gray-100"
          onClick={() => setMenuOpen(!isMenuOpen)}
        >
          <span className="block">=</span>
          <span className="block">=</span>
          <span className="block">=</span>
        </button>
      </div>
    </header>
  );
};

export default Header;
