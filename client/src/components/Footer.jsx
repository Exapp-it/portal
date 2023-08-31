import React from "react";

const Footer = () => {
  return (
    <footer className="bg-gray-800 text-white py-10 rounded-t-lg w-full shadow-lg">
      <div className="container mx-auto px-4">
        <div className="flex justify-between mb-10">
          <div className="space-y-4">
            <h3 className="text-2xl mb-3 font-semibold shadow-md">About Us</h3>
            <ul className="list-none space-y-2">
              <li>
                <a href="#" className="hover:underline text-lg">
                  Our Story
                </a>
              </li>
              <li>
                <a href="#" className="hover:underline text-lg">
                  Team
                </a>
              </li>
              <li>
                <a href="#" className="hover:underline text-lg">
                  Careers
                </a>
              </li>
            </ul>
          </div>

          <div className="space-y-4">
            <h3 className="text-2xl mb-3 font-semibold shadow-md">Contact</h3>
            <ul className="list-none space-y-2">
              <li>
                <a href="#" className="hover:underline text-lg">
                  Support
                </a>
              </li>
              <li>
                <a href="#" className="hover:underline text-lg">
                  Sales
                </a>
              </li>
              <li>
                <a href="#" className="hover:underline text-lg">
                  Advertise
                </a>
              </li>
            </ul>
          </div>

          <div className="space-y-4">
            <h3 className="text-2xl mb-3 font-semibold shadow-md">Follow Us</h3>
            <ul className="flex space-x-6 text-2xl">
              <li>
                <a
                  href="#"
                  className="hover:text-gray-400 transition duration-300"
                >
                  <i className="fab fa-facebook-f"></i>
                </a>
              </li>
              <li>
                <a
                  href="#"
                  className="hover:text-gray-400 transition duration-300"
                >
                  <i className="fab fa-twitter"></i>
                </a>
              </li>
              <li>
                <a
                  href="#"
                  className="hover:text-gray-400 transition duration-300"
                >
                  <i className="fab fa-instagram"></i>
                </a>
              </li>
            </ul>
          </div>
        </div>

        <div className="border-t pt-8 border-gray-700">
          <p className="text-center text-sm">
            © 2023 Exapp. All Rights Reserved.
          </p>
        </div>
      </div>
    </footer>
  );
};

export default Footer;
