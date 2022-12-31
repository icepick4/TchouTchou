/**
 * @param {string} header_title - Title of modal
 * @param {string} header_color - Color of title
 * @param {string} header_background_color - Background color of title
 * @param {string} text - Text of modal
 * @param {string} footer_text - Text of footer
 * @param {string} footer_color - Color of footer
 * @param {string} footer_background_color - Background color of footer
 * @param {number} time - Time to show modal in seconds
 * @param {boolean} isShown - Show modal or not
 * @param {string} button_color - Color of buttons
 * @param {string} button_background_color - Background color of buttons
 * @param {string} button_hover_background_color - Background color of buttons when hover
 * @param {string} messages - Messages of buttons
 * @summary Create a modal
 *
 */
export class Modal {
	static button = false;
	constructor(
		header_title,
		text,
		footer_text,
		modal_type,
		time,
		isShown,
		...messages
	) {
		this.header_title = header_title;
		this.text = text;
		this.footer_text = footer_text;
		this.modal_type = modal_type;
		this.time = time;
		this.messages = messages;
		this.modal_header = this.createModalHeader();
		this.modal_body = this.createModalBody();
		this.modal_footer = this.createModalFooter(this.messages);
		this.modal = this.createModal();
		if (isShown) {
			this.showModal();
		}
		if (this.messages.length > 0) {
			this.modal_footer.childNodes[1].childNodes[0].focus(); //put the focus on the first button
		} else {
			this.modal_header.childNodes[0].focus(); //put the focus on the title
		}
		if (time != 'infinite') {
			setTimeout(() => {
				this.closeModal();
			}, time * 1000);
		}
	}

	createModal() {
		// Modal
		let modal = document.createElement('div');
		modal.classList.add('modal');
		if (this.modal_type != null) {
			modal.classList.add(this.modal_type);
		}
		modal.style.display = 'none';
		modal.id = 'myModal';

		// Modal content
		let modal_content = document.createElement('div');
		modal_content.classList.add('modal--content');
		modal_content.appendChild(this.modal_header);
		modal_content.appendChild(this.modal_body);
		modal_content.appendChild(this.modal_footer);

		// Append modal content to modal
		modal.appendChild(modal_content);
		modal.addEventListener('click', (event) => {
			if (event.target == modal) {
				this.closeModal();
			}
		});
		document.body.appendChild(modal);
		return modal;
	}

	createModalHeader() {
		let modal_header = document.createElement('div');
		modal_header.classList.add('modal--header');
		let modal_header_title = document.createElement('h2');
		modal_header_title.innerHTML = this.header_title;
		let modal_header_close = document.createElement('button');
		modal_header_close.classList.add('close--modal');
		modal_header_close.innerHTML = '&times;';
		modal_header.appendChild(modal_header_close);
		modal_header.appendChild(modal_header_title);
		modal_header_close.addEventListener('click', () => {
			this.closeModal();
		});
		return modal_header;
	}

	createModalBody() {
		let modal_body = document.createElement('div');
		modal_body.classList.add('modal--body');
		let modal_body_text = document.createElement('p');
		modal_body_text.innerHTML = this.text;
		modal_body.appendChild(modal_body_text);
		return modal_body;
	}

	createModalFooter(messagess) {
		var modal_footer = document.createElement('div');
		modal_footer.classList.add('modal--footer');
		let modal_footer_text = document.createElement('h3');
		modal_footer_text.innerHTML = this.footer_text;
		modal_footer.appendChild(modal_footer_text);
		if (this.messages.length > 0) {
			this.addButtons(modal_footer);
		}
		return modal_footer;
	}

	addButtons(modal_footer) {
		let modal_footer_buttons = document.createElement('div');
		modal_footer_buttons.classList.add('modal--footer-buttons');
		modal_footer.appendChild(modal_footer_buttons);
		for (let i = 0; i < this.messages.length; i++) {
			let modal_footer_button = document.createElement('button');
			modal_footer_button.classList.add('modal--footer-button');
			modal_footer_button.innerHTML = this.messages[i];
			modal_footer_button.id = 'btnmodal-' + [i];
			modal_footer_buttons.appendChild(modal_footer_button);
			if ([i] == 0) {
				modal_footer_button.focus();
			}
			modal_footer_button.addEventListener('click', () => {
				this.closeModal();
			});
		}
	}

	get buttons() {
		return this.messages;
	}

	showModal() {
		this.modal.style.display = 'block';
		document.body.style.overflow = 'hidden';
	}
	closeModal() {
		this.modal.style.display = 'none';
		document.body.style.overflow = 'auto';
		this.modal.remove();
	}
}

// Example of modal

/**
 * @param {string} header_title text: can be null
 * @param {string} text text: Can be null
 * @param {string} time Not required: default is infinite
 */
export class InfoModal extends Modal {
	constructor(header_title, text, time) {
		if (time == null) time = 'infinite';
		super(header_title, text, null, 'info--modal', time, true);
	}
}

/**
 * @param {string} header_title text: can be null
 * @param {string} text text: Can be null
 * @param {string} time Not required: default is infinite
 */
export class ErrorModal extends Modal {
	constructor(header_title, text, time) {
		if (time == null) time = 'infinite';
		super(header_title, text, null, 'error--modal', time, true);
	}
}

/**
 * @param {string} header_title text: can be null
 * @param {string} text text: Can be null
 * @param {string} time Not required: default is infinite
 */
export class SuccessModal extends Modal {
	constructor(header_title, text, time) {
		if (time == null) time = 'infinite';
		super(header_title, text, null, 'success--modal', time, true);
	}
}

/**
 * @param {string} header_title text: can be null
 * @param {string} text text: Can be null
 * @param {string} confirmText Confirm button text
 * @param {string} cancelText Cancel button text
 */
export class ConfirmModal extends Modal {
	constructor(header_title, text, confirmText, cancelText) {
		super(
			header_title,
			text,
			null,
			'confirm--modal',
			'infinite',
			true,
			confirmText,
			cancelText
		);
	}
}
