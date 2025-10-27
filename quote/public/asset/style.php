<style>
  * {
        padding: 0;
        margin: 0;
        box-sizing: border-box;
    }

    :root {
        --text-col: #444444;
        --btn-col: #0069FF;
        --borde-col: #dcdbdbff;
        --subBtn-col: #F2F8FF;
        --subBorder: #D2E4FF;
    }


    .container {
        display: flex;
        align-items: center;
        justify-content: center;
        height: 100vh;
    }

    .carousel {
        width: 400px;
        height: 500px;
        box-shadow: 5px 10px 10px rgba(0, 0, 0, 0.2)d;

    }

    .carousel-inner img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        border-radius: 5px;
    }

    .carousel-item {
        position: relative;
    }

    .carousel-item::after {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(to bottom, rgba(0, 0, 0, 0.2), rgba(0, 0, 0, 0.5));
        z-index: 1;
    }

    .carousel-caption {
        position: absolute;
        z-index: 2;
    }

    .carousel-control-prev {
        background: green;
        position: absolute;
        top: 0;
    }

    button {
        background: red;
    }

    @media (max-width: 950px) {
        .carousel {
            width: 100%;
            height: 100%;
        }
    }


    /* register/login */

    .genContainer {
        display: flex;
        align-items: center;
        justify-content: center;
        height: 90vh;
    }

    .genContainer form {
        width: 40%;
        padding: 70px 10px;
        border-radius: 10px;
        box-shadow: 0px 4px 21px -12px rgba(0, 0, 0, 0.79);
    }

    .genContainer form h1 {
        text-align: center;
        font-size: 25px;
        font-weight: 350;
        padding-bottom: 15px;
        text-transform: capitalize;
        color: var(--text-col);
    }

    .genContainer form .forms input {
        width: 100%;
        margin: 12px 0px;
        padding: 8px;
        outline: none;
        border-radius: 5px;
        border: 1px solid var(--borde-col);
        color: var(--text-col);
        font-size: 15px;
    }

    .genContainer form .forms input::placeholder {
        font-size: 15px;
    }


    .genContainer form .forms .formBtn button {
        width: 100%;
        margin-top: 10px;
        padding: 10px;
        background: var(--btn-col);
        border: none;
        border-radius: 5px;
        font-size: 15px;
        color: #fff;
        cursor: pointer;
    }


    @media (max-width: 1200px) {
        .container {
            padding: 20px;
        }

        .genContainer form {
            width: 90%;
            padding: 50px 10px;
        }


    }

    @media (max-width: 550px) {
        .container {
            padding: 0px;
        }

        .genContainer form {
            box-shadow: none;
        }
    }
</style>