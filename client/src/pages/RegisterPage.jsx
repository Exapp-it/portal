import { useState } from "react";
import axios from "axios";

const RegisterPage = () => {
  const [formData, setFormData] = useState({
    name: "",
    email: "",
    password: "",
    password_confirmation: "",
    currency: "",
  });

  const [errors, setErrors] = useState({});

  const validate = () => {
    let formErrors = {};

    if (!formData.name) formErrors.name = "Name is required";
    else if (formData.name.length < 2)
      formErrors.name = "Name should be at least 2 characters";

    if (!formData.email) formErrors.email = "Email is required";
    else if (!/\S+@\S+\.\S+/.test(formData.email))
      formErrors.email = "Email is invalid";

    if (!formData.password) formErrors.password = "Password is required";
    else if (formData.password.length < 6)
      formErrors.password = "Password should be at least 6 characters";

    if (formData.password !== formData.password_confirmation)
      formErrors.password_confirmation = "Passwords do not match";

    if (!formData.currency) formErrors.currency = "Currency is required";
    else if (!["USD", "EUR", "RUB"].includes(formData.currency))
      formErrors.currency = "Invalid currency";

    setErrors(formErrors);

    return Object.keys(formErrors).length === 0;
  };

  const handleInputChange = (e) => {
    setFormData({
      ...formData,
      [e.target.name]: e.target.value,
    });
  };

  const handleSubmit = (e) => {
    e.preventDefault();

    if (validate()) {
      axios
        .post("http://127.0.0.1:8000/api/auth/register", formData)
        .then((response) => {
            let message = response.data.data.message
            let user = response.data.data.user
            alert(message)
          console.log(user); // здесь вы получаете успешный ответ от сервера
          // например, показать уведомление об успешной регистрации или перенаправить пользователя куда-либо
        })
        .catch((error) => {
          if (error.response && error.response.status === 422) {
            setErrors(error.response.data);
          } else {
            alert(error.message)
          }
        });
    }
  };

  return (
    <div className="max-w-md mx-auto p-6 bg-white rounded-lg shadow-md">
      <h2 className="text-2xl font-semibold mb-4">Register</h2>
      <form onSubmit={handleSubmit}>
        <div className="mb-4">
          <label
            htmlFor="name"
            className="block text-sm font-medium text-gray-700"
          >
            Name
          </label>
          <input
            type="text"
            id="name"
            name="name"
            className="mt-1 p-2 w-full border rounded-md"
            value={formData.name}
            onChange={handleInputChange}
          />
          {errors.name && (
            <div className="mt-2 bg-red-100 border-l-4 border-red-500 text-red-700 p-2 rounded shadow-sm">
              <p className="text-sm font-normal">{errors.name}</p>
            </div>
          )}
        </div>

        <div className="mb-4">
          <label
            htmlFor="email"
            className="block text-sm font-medium text-gray-700"
          >
            Email
          </label>
          <input
            type="email"
            id="email"
            name="email"
            className="mt-1 p-2 w-full border rounded-md"
            value={formData.email}
            onChange={handleInputChange}
          />
          {errors.email && (
            <div className="mt-2 bg-red-100 border-l-4 border-red-500 text-red-700 p-2 rounded shadow-sm">
              <p className="text-sm font-normal">{errors.email}</p>
            </div>
          )}
        </div>

        <div className="mb-4">
          <label
            htmlFor="password"
            className="block text-sm font-medium text-gray-700"
          >
            Password
          </label>
          <input
            type="password"
            id="password"
            name="password"
            className="mt-1 p-2 w-full border rounded-md"
            value={formData.password}
            onChange={handleInputChange}
          />
          {errors.password && (
            <div className="mt-2 bg-red-100 border-l-4 border-red-500 text-red-700 p-2 rounded shadow-sm">
              <p className="text-sm font-normal">{errors.password}</p>
            </div>
          )}
        </div>
        <div className="mb-4">
          <label
            htmlFor="password_confirmation"
            className="block text-sm font-medium text-gray-700"
          >
            Confirm Password
          </label>
          <input
            type="password"
            id="password_confirmation"
            name="password_confirmation"
            className="mt-1 p-2 w-full border rounded-md"
            value={formData.password_confirmation}
            onChange={handleInputChange}
          />
          {errors.password_confirmation && (
            <div className="mt-2 bg-red-100 border-l-4 border-red-500 text-red-700 p-2 rounded shadow-sm">
              <p className="text-sm font-normal">
                {errors.password_confirmation}
              </p>
            </div>
          )}
        </div>
        <div className="mb-4">
          <label
            htmlFor="currency"
            className="block text-sm font-medium text-gray-700"
          >
            Currency
          </label>
          <select
            id="currency"
            name="currency"
            value={formData.currency}
            onChange={handleInputChange}
            className="mt-1 p-2 w-full border rounded-md"
          >
            <option value="" disabled>
              Select a currency
            </option>
            <option value="USD">USD</option>
            <option value="RUB">RUB</option>
            <option value="EUR">EUR</option>
          </select>
        </div>
        {errors.currency && (
          <div className="mt-2 bg-red-100 border-l-4 border-red-500 text-red-700 p-2 rounded shadow-sm">
            <p className="text-sm font-normal">{errors.currency}</p>
          </div>
        )}
        <button
          type="submit"
          className="bg-blue-500 text-white mt-2 p-2 w-full rounded-md hover:bg-blue-600"
        >
          Register
        </button>
      </form>
    </div>
  );
};

export default RegisterPage;
