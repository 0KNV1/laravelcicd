describe('The Home Page', () => {
    it('successfully loads', () => {
    
      cy.visit('http://127.0.0.1:8000/login')
      
      // cy.get("#container").should("exist")
      cy.get('input[name=email]').type('user@user.com')
      cy.get('input[name=password]').type('password')
      cy.get('.ml-4').click()
  
      cy.get('#headlessui-menu-button-3').click()
      cy.get('#headlessui-menu-item-9').click()
  
      cy.get('form > :nth-child(1)').click()
  
      cy.get(':nth-child(1) > input').selectFile('cypress/e2e/11 - Quiz2-NOP(id).pdf')
      
      
      cy.get('#headlessui-listbox-button-11').click()
      cy.get('#headlessui-listbox-option-14 > .flex').click()
      
      cy.get('input[name=name]').type('asd')
      cy.get('input[name=price]').type('123')
      cy.get('input[name=description]').type('asd')
      
      cy.get('.inline-flex').click()
  
  
      // // {enter} causes the form to submit
      // cy.get('input[name=password]').type(`${password}{enter}`)
  
      // // we should be redirected to /dashboard
      // cy.url().should('include', '/dashboard')
      // cy.get('button').click()
    })
  })