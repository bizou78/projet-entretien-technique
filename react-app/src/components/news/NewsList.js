import { useEffect, useState } from "react";
import { useMatch, useNavigate, useLocation } from 'react-router-dom';

import { newsService } from "../../services/news.service";
import { News } from "./News";

import styles from './NewsList.module.scss';

export const NewsList = () => {

    const [news, setNews] = useState();
    

    useEffect(() => {
        newsService.getNews().then((data) => {
            setNews(data['hydra:member']);
        }).catch((err) => {
            console.log('Error fetching News', err);
        })
    }, []);

    return news ? (
        <div className={styles.newsList}>
            <h1>Voici les News</h1>
            {news.map((news) => (
                <News key={news.id} news={news} />
            ))}
        </div>
    ) : <></>;

}