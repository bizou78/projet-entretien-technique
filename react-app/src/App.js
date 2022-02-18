import { BrowserRouter as Router, Route, Routes, Navigate } from 'react-router-dom';
import './App.css';
import { NewsDetails } from './components/news/NewsDetails';
import { NewsList } from "./components/news/NewsList";

function App() {
  return (
    <div className="App">
      <Router>
        <Routes>
          <Route path="/news" element={<NewsList />} />
          <Route path="/news/:id" element={<NewsDetails/>} />
          <Route path="*" element={<Navigate to="/news" />} />
        </Routes>
      </Router>
    </div>
  );
}

export default App;
