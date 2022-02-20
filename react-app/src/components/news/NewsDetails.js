import { useEffect, useState } from "react";
import { Link, useParams } from "react-router-dom";
import { newsService } from "../../services/news.service";


export const NewsDetails = () => {

    const [news, setNews] = useState();
    const { id } = useParams();

    useEffect(() => {
        newsService.getOneNews(id).then((data) => setNews(data));
    }, [id]);

    return news ? (
        <div>
            <div>
                <h1>{news.title}</h1>
            </div>
            <img src="https://random.imagecdn.app/800/400" alt="Image News" />
            <div>{news.description}</div>

            <Link to={'/news'} className="btn dark">Retour</Link>
        </div>
    ) : null;

}