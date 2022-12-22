describe('empty spec', () => {
  it('passes', () => {
    
    cy.visit('http://127.0.0.1:8000/login')
      
    // cy.get("#container").should("exist")
    cy.get('input[name=email]').type('user@user.com')
    cy.get('input[name=password]').type('password')
    cy.get('.ml-4').click()

    cy.get('#headlessui-menu-button-3').click()
    cy.get('#headlessui-menu-item-6').click()

    cy.get('.divide-y > :nth-child(1) > :nth-child(4)').click()
  })
})