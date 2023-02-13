const btn = document.querySelector("#btn_submit");
        const btnText = document.querySelector("#btn_submitText");

        btn.onclick = () => {
            btnText.innerHTML = "Thanks";
            btn.classList.add("active");
        };