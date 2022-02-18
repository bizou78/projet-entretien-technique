import styles from './News.module.scss';
import { useMatch, useNavigate, useLocation } from 'react-router-dom';

export const News = ({ news }) => {
    const { id, title, description, publishedDate, image } = news;

    const location = useLocation();
    const navigate = useNavigate();

    const select = (id) => {
        const url = location.pathname;
        navigate(`${url}/${id}`);
    }

    return (
        <div onClick={() => select(news.id)} className={styles.news}>
            <div className="title">
                <span>
                    <h2>{title}</h2>
                </span>
            </div>
            <div className="image">
                <img src="https://random.imagecdn.app/500/300" alt={'Image News'} />
            </div>
            <div>
                <p>
                    {description}
                </p>
            </div>
        </div>
    )
}