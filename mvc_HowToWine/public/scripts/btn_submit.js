const btn = document.querySelector("#btn_submit");
        const btnText = document.querySelector("#btn_submitText");

        btn.onclick = () => {
            btnText.innerHTML = "Merci";
            btn.classList.add("active");
        };