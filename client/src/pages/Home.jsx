import React, { useState, useEffect } from "react";
import api from "../services/api";

function Home() {
  const [data, setData] = useState({});

  useEffect(() => {
    const fetchData = async () => {
      try {
        const response = await api.get('/');  // Эндпоинт вашего API
        setData(response.data);
      } catch (error) {
        console.error("Error fetching data:", error);
      }
    };

    fetchData();
  }, []);

  return (
    <div>
      <div>
        {data.status ? <p>Status: {data.status}</p> : null}
        {data.message ? <p>Message: {data.message}</p> : null}
      </div>
    </div>
  );
}

export default Home;
