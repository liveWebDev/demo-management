import { PrimerPage } from './app.po';

describe('primer App', function() {
  let page: PrimerPage;

  beforeEach(() => {
    page = new PrimerPage();
  });

  it('should expect true to be true', () => {
    expect(true).toBe(true);
  });
});
