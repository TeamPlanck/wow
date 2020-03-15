
function showMessage( msgText, msgType) {
    
    var body = document.querySelector('body');
    var panel = document.createElement('div');
	var msg = document.createElement('p');
	
    panel.setAttribute('class','msgBox');
	panel.classList.add('animated', 'slideInDown');
    
	body.appendChild(panel);
    msg.textContent = msgText;
    panel.appendChild(msg);
	msg.setAttribute('class','title');
	
	if(msgType == 'success' || msgType == 0) msg.style.color = '#4caf50';
	else if(msgType == 'denger' || msgType == 1) msg.style.color = '#f44336';
	else if(msgType == 'warning' || msgType == 2) msg.style.color = '#ffeb3b';

	setTimeout(function () {
		panel.classList.remove('slideInDown');
        panel.classList.add('animated', 'fadeOutUp');
        setTimeout(function () {
            body.removeChild(panel);
        }, 1000);
    }, 3000);
}
