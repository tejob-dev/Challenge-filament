class InteractiveChatbox {
    constructor(a, d, b, c) {
        this.args = {
            button: a,
            iccloser: d,
            chatbox: b
        }
        this.icons = c;
        this.state = false; 
    }

    display() {
        const {button, iccloser, chatbox} = this.args;
        
        button.addEventListener('click', () => this.toggleState(chatbox))
        iccloser.addEventListener('click', () => this.toggleState(chatbox))
    }

    toggleState(chatbox) {
        this.state = !this.state;
        this.showOrHideChatBox(chatbox, this.args.button);
    }

    showOrHideChatBox(chatbox, button) {
        if(this.state) {
            chatbox.classList.add('chatbox--active')
            this.toggleIcon(true, button);
        } else if (!this.state) {
            chatbox.classList.remove('chatbox--active')
            this.toggleIcon(false, button);
        }
    }

    toggleIcon(state, button) {
        const { isClicked, isNotClicked } = this.icons;
        let b = button.children[0].innerHTML;
        const chatContent = document.querySelector('.chatbox__support');

        if(state) {
            button.children[0].innerHTML = isClicked;
            chatContent.style.display = "block";
        } else if(!state) {
            button.children[0].innerHTML = isNotClicked;
            chatContent.style.display = "none";
        }
    }
}